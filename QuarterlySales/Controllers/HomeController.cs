using System.Linq;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using QuarterlySales.Models;

namespace QuarterlySales.Controllers
{
    public class HomeController : Controller
    {
        private SalesContext context { get; set; }
        public HomeController(SalesContext ctx) => context = ctx;
        
        [HttpGet]
        public ViewResult Index(int ID)
        {
            IQueryable<Sales> query = context.Sales
                .Include(s => s.Employee)
                .OrderBy(s => s.Year);

            if (ID > 0)
                query = query.Where(s => s.EmployeeId == ID);

            var vm = new SalesListViewModel
            {
                Sales = query.ToList(),  // execute sales query
                Employees = context.Employees.OrderBy(e => e.Firstname).ToList(),
                EmployeeId = ID
            };
            return View(vm);
        }

        [HttpPost]
        public RedirectToActionResult Index(Employee employee)
        {
            if (employee.EmployeeId > 0)
                return RedirectToAction("Index", new { id = employee.EmployeeId });
            else
                return RedirectToAction("Index", new { id = "" });
        }
    }
}

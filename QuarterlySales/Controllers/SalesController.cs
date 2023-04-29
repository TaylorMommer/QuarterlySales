using Microsoft.AspNetCore.Mvc;
using QuarterlySales.Models;
using System.Linq;

namespace QuarterlySales.Controllers
{
    public class SalesController : Controller
    {
        private SalesContext context { get; set; }
        public SalesController(SalesContext ctx) => context = ctx;
        public IActionResult Index() => RedirectToAction("Index", "Home");

        [HttpGet]
        public IActionResult Add()
        {
            ViewBag.Sales = context.Sales.OrderBy(sl => sl.Year).ToList();
            return View();

        }
        [HttpPost]
        public IActionResult Add(Sales sales)
        {
            //checks for remote validation 
            string msg = Validate.CheckSales(context, sales);
            if (!string.IsNullOrEmpty(msg))
            {
                ModelState.AddModelError(nameof(Sales.EmployeeId), msg);
            }
         
            if (ModelState.IsValid)
            {
                context.Sales.Add(sales);
                context.SaveChanges();
                TempData["message"] = $"${sales.Amount} added for {sales.Employee}";
                return RedirectToAction("Index", "Home");
            }
            else
            {
                ViewBag.Sales = context.Sales.OrderBy(sl => sl.Year).ToList();
                return View();
            }
        }
    }
}

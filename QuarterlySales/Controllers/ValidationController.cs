using System;
using System.Linq;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using QuarterlySales.Models;

namespace QuarterlySales.Controllers
{
    public class Validation_Controller : Controller
    {
        public class ValidationController : Controller
        {
            private SalesContext context { get; set; }
            public ValidationController(SalesContext ctx) => context = ctx;

            public JsonResult CheckEmployee(DateTime dob, string firstname, string Lastname)
            {
                var employee = new Employee
                {
                    Firstname = firstname,
                    Lastname = Lastname,
                    DOB = dob
                };
                string msg = Validate.CheckEmployee(context, employee);
                if (string.IsNullOrEmpty(msg))
                    return Json(true);
                else
                    return Json(msg);
            }

            public JsonResult CheckManager(int managerId, string firstname, string Lastname, DateTime dob)
            {
                var employee = new Employee
                {
                    Firstname = firstname,
                    Lastname = Lastname,
                    DOB = dob,
                    ManagerId = managerId
                };
                string msg = Validate.CheckManagerEmployeeMatch(context, employee);
                if (string.IsNullOrEmpty(msg))
                    return Json(true);
                else
                    return Json(msg);
            }

            public JsonResult CheckSales(int quarter, int year, int employeeId)
            {
                var sales = new Sales
                {
                    Quarter = quarter,
                    Year = year,
                    EmployeeId = employeeId
                };
                string msg = Validate.CheckSales(context, sales);
                if (string.IsNullOrEmpty(msg))
                    return Json(true);
                else
                    return Json(msg);
            }

        }
    }
}
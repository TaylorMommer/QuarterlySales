using System.Collections.Generic;

namespace QuarterlySales.Models
{
    internal class SalesListViewModel
    {

        public List<Sales> Sales { get; set; }
        public List<Employee> Employees { get; set; }
        public int EmployeeId { get; set; }


    }
}
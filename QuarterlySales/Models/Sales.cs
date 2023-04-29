using Microsoft.AspNetCore.Components.Forms;
using System.Collections.Generic;

namespace QuarterlySales.Models
{
    public class Sales
    {
        public int SalesId { get; set; }
        public int? Quarter { get; set; }    

        public int? Year { get; set; }   

        public double? Amount { get; set; }

        public Employee Employee { get; set; }
        public int EmployeeId { get; internal set; }
        public ICollection<Sales> Employees { get; set; }


    }
}

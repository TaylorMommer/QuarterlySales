using Microsoft.EntityFrameworkCore;
using System;

namespace QuarterlySales.Models
{
    public class SalesContext : DbContext
    {
        public SalesContext(DbContextOptions<SalesContext> options)
            : base(options)
        { }

        public DbSet<Employee> Employees { get; set; }
        public DbSet<Sales> Sales { get; set; }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            base.OnModelCreating(modelBuilder);
            modelBuilder.Entity<Employee>().HasData(
            new Employee
            {
                EmployeeId = 1,
                Firstname = "Ada",
                Lastname = "Lovelace",
                DOB = new DateTime(1956, 12, 10),
                DateOfHire = new DateTime(1995, 1, 1),
                ManagerId = 0,
            },
                new Employee
                {
                    EmployeeId = 2,
                    Firstname = "Taylor",
                    Lastname = "Mommer",
                    DOB = new DateTime(1993, 12, 23),
                    DateOfHire = new DateTime(2012, 10, 12),
                    ManagerId = 1
                },
                new Employee
                {
                    EmployeeId = 2,
                    Firstname = "Frank",
                    Lastname = "Burman",
                    DOB = new DateTime(1998, 10, 01),
                    DateOfHire = new DateTime(2022, 7, 24),
                    ManagerId = 1,

                });
            modelBuilder.Entity<Sales>().HasData(
            new Sales
            {
                SalesId = 4,
                Quarter = 1,
                Year = 2022,
                Amount = 223.32,
                EmployeeId = 2
            },
            new Sales
            {
                SalesId = 2,
                Quarter = 1,
                Year = 2023,
                Amount = 324.32,
                EmployeeId = 2

            },
            new Sales
            {
                SalesId = 1,
                Quarter = 1,
                Year = 2021,
                Amount = 24.32,
                EmployeeId = 1

            },
            new Sales
            {
                SalesId = 1,
                Quarter = 2,
                Year = 2022,
                Amount = 554.12,
                EmployeeId = 3

            });

        }


    }
}

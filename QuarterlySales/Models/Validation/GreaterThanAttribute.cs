using Microsoft.AspNetCore.Mvc.ModelBinding.Validation;
using System;
using System.ComponentModel.DataAnnotations;
using System.Security.Cryptography;

namespace QuarterlySales.Models.Validation
{
    internal class GreaterThanAttribute : ValidationAttribute
    {
        private int numYears;
        public GreaterThanAttribute(int years)
        {
            numYears = years;
        }

        public GreaterThanAttribute(string errorMessage, string ErrorMessage) : base(errorMessage)
        {
        }

        public bool IsPast { get; set; } = false;

        protected override ValidationResult IsValid(object value, ValidationContext ctx)
        {
            if (value is DateTime)
            {
                DateTime dateToCheck = (DateTime)value;
                
                
                DateTime now = DateTime.Today;
                DateTime from;
                if (IsPast)
                {
                    from = new DateTime(now.Year, 1, 1);
                    from = from.AddYears(-numYears);
                }
                else
                {
                    from = new DateTime(now.Year, 12, 31);
                    from = from.AddYears(numYears);
                }


                ////

                if (IsPast)
                {
                    if (dateToCheck >= from && dateToCheck < now){
                        return ValidationResult.Success;
                    }
                }
                else{
                    if (dateToCheck > now && dateToCheck <= from){
                        return ValidationResult.Success;
                    }
                }
            }
            string msg = base.ErrorMessage ??
                ctx.DisplayName + "must be a " + (IsPast ? "past" : "future") + "date within " + numYears + "years from now. ";
                
               // $"{ctx.DisplayName} must be a valid date in the past";
            return new ValidationResult(msg);
        }
    }
}
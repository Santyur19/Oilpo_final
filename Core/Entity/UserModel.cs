using Oilpo;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace Oilpo
{
    public class UserModel : BaseModel
    {
        [EmailAddress]
        [Required]
        public string Email { get; set; }
        [Required]
        [StringLength(5)]
        public string Password { get; set; }
        [Compare("Password")]
        [Required]
        public string ConfirmPassword { get; set; }



    }
}

using Oilpo;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Net.Sockets;
using System.Threading.Tasks;

namespace Oilpo
{
    [Table("Customer")]
    public class CustomerModel :BaseModel
    {
        [Required]
        public string Name { get; set; }
        [EmailAddress]
        public string Email { get; set; }
        [Required]
        public string Phone { get; set; }

        public string Adrress { get; set; }

        public string Notes { get; set; }


    }
}

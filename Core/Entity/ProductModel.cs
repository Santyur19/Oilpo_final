

namespace Oilpo
{
    using Oilpo;
    using System;
    using System.Collections.Generic;
    using System.ComponentModel;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Linq;
    using System.Threading.Tasks;


    [Table("Product")]
    public class ProductModel : BaseModel
    {
        [Required]
        public string Name { get; set; }

        [Required]
        [DisplayName("Code")]
        public string Code { get; set; }
        [Required]
        public int Stock { get; set; }
        [Required]
        public double Price { get; set; }
        public string Description { get; set; }
        public string Notes { get; set; }

    }

}

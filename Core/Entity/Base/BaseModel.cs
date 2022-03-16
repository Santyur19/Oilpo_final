

namespace Oilpo
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Linq;
    using System.Threading.Tasks;
    public class BaseModel
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int Id { get; set; }
        [Column(TypeName = "int")]
        public DateTime CreateDate { get; set; }
        [Column(TypeName = "datetime2")]
        public DateTime UpdateDate { get; set; }
        public bool IsDelete { get; set; }
    }

}

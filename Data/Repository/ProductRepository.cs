using Oilpo;
using Oilpo;
using Oilpo;
using Oilpo;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Oilpo
{
    public class ProductRepository : BaseRepository<ProductModel>, IProductRepository
    {
        public ProductRepository(InvoiceDbContext context) : base(context)
        {
        }
    }

}

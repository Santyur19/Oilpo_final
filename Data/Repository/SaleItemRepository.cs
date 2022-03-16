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
    public class SaleItemRepository : BaseRepository<SalesItemsModel>, ISaleItemRepository
    {
        public SaleItemRepository(InvoiceDbContext context) : base(context)
        {
        }
    }

}

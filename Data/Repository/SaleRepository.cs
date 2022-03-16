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
    public class SaleRepository : BaseRepository<SalesModel>, ISaleRepository
    {
        private readonly InvoiceDbContext context;

        public SaleRepository(InvoiceDbContext context) : base(context)
        {
            this.context = context;
        }

        public void UpdatePlusStock(int productId, int stock)
        {
            var product = context.Products.Find(productId);
            product.Stock = product.Stock + stock;
            context.SaveChanges();
        }
        public void UpdateMinusStock(int productId, int stock)
        {
            var product = context.Products.Find(productId);
            product.Stock = product.Stock - stock;
            context.SaveChanges();
        }
    }

}

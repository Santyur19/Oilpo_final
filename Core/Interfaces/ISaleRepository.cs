using Oilpo;
using Oilpo;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Oilpo
{
    public interface ISaleRepository : IBaseRepository<SalesModel>
    {
        void UpdatePlusStock(int productId, int stock);
        void UpdateMinusStock(int productId, int stock);
    }

}

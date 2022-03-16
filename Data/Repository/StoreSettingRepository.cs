

namespace Oilpo
{ 
    using Oilpo;
    using Oilpo;
    using Oilpo;
    using Oilpo;
    using System;
    using System.Collections.Generic;
    using System.Linq;
    using System.Threading.Tasks;
    public class StoreSettingRepository : BaseRepository<StoreSettingModel>, IStoreSettingRepository
    {
        public StoreSettingRepository(InvoiceDbContext context) : base(context)
        {
        }
    }

}

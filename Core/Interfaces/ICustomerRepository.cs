

namespace Oilpo
{
    using Oilpo;
    using Oilpo;
    using Microsoft.AspNetCore.Mvc.Rendering;
    using System;
    using System.Collections.Generic;
    using System.Linq;
    using System.Threading.Tasks;
    public interface ICustomerRepository : IBaseRepository<CustomerModel>
    {
        IEnumerable<SelectListItem> GetAllForDropDown();
    }

}

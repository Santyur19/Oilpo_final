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
    public interface IUserRepository : IBaseRepository<UserModel>
    {
        bool ValidateUser(LoginViewModel user);
    }
}

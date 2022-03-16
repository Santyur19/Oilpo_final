using Oilpo;
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
    public class UserRepository : BaseRepository<UserModel>, IUserRepository
    {
        public UserRepository(InvoiceDbContext context) : base(context)
        {
        }

        public bool ValidateUser(LoginViewModel user)
        {
            return All().Any(x => x.Email == user.Email && x.Password == user.Password);
        }
    }

}

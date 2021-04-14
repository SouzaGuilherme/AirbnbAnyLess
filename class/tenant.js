import User from './user'

class Tenant extends User{
  constructor(name, cpf, email, phone, avatar){
    super(name, cpf, email, phone, avatar);
    this.name = name;
    this.cpf = cpf;
    this.email = email;
    this.phone = phone;
    this.avatar = avatar;
  };

  get tenant(){
    super.user();
  };

  set tenant(newTenant){
    super.user(newTenant);
  };

  createTenant(){};
  viewProperty(){};
  rentProperty(){};
}

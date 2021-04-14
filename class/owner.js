import User from './user'

class Owner extends User{
  constructor(name, cpf, email, phone, avatar){
    super(name, cpf, email, phone, avatar);
    this.name = name;
    this.cpf = cpf;
    this.email = email;
    this.phone = phone;
    this.avatar = avatar;
  };

  get owner(){
    super.user();
  };

  set owner(newOwner){
    super.user(newOwner);
  };

  createOwner(){};
  viewRents(){};
  registerProperty(){};
  removeProperty(){};
  editProperty(){};
}

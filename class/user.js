class user{
  constructor(name, cpf, email, phone, avatar){
    this.name = name;
    this.cpf = cpf;
    this.email = email;
    this.phone = phone;
    this.avatar = avatar;
  };

  get user(){};
  set user(newUser){};
}

export user;

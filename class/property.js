class Property{
  constructor(
    codigo, description, numberBedrooms, 
    numberBethrooms, numberLivingRooms, pool, 
    parkingSpaces, valueProperty, rented
  ){
    this.codigo = codigo;
    this.description = description;
    this.numberBedrooms = numberBedrooms;
    this.numberBethrooms = numberBethrooms;
    this.numberLivingRooms = numberLivingRooms;
    this.pool = pool;
    this.parkingSpaces = parkingSpaces;
    this.valueProperty = valueProperty;
    this.rented = rented;
  };

  createProperty(){};
  removeProperty(){};
};

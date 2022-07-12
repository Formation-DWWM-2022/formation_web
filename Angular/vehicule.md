```js
export abstract class Vehicle {

    constructor(
      protected _brand: string,
      protected _model: string,
      protected _color: string
    ) { }
  
    // getter => récupère la valeur de l'attribut _model
    get model(): string {
      return this._model;
    }
  
    get brand(): string {
      return this._brand;
    }
  
    get color(): string {
      return this._color;
    }
  
    // setter => modifie la valeur de l'attribut _color
    set color(value: string) {
      this._color = value;
    }
  
    moveForward(): void {
      console.log('Vroum très vite en avant');
    }
  
    moveBackward(): void {
      console.log('Vroum très vite mais en arrière');
    }
  
    depasser(vehicle: Vehicle): void {
      this.moveForward();
      vehicle.moveForward();
      this.moveForward();
    }
  
  }
  ```

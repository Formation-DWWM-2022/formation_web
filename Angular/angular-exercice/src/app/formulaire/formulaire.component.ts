import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-formulaire',
  templateUrl: './formulaire.component.html',
  styleUrls: ['./formulaire.component.css']
})
export class FormulaireComponent implements OnInit {
  result = {name:"",prenom:"",statut:"",message:""};

  @Output() userSelected = new EventEmitter();
  addUser() {
  this.userSelected.emit(this.result);
  }
  constructor() { }

  ngOnInit() {
  }

}

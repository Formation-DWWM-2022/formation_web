import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'workshop5';
  users = [];
  message = "";
  status = 0;
  addUser($event){
    this.status  = 0;
      if($event.name == "" || $event.prenom=="")
      {
        this.message = "les champs sont obligatoires"
        this.status = -1
      }
      else if(this.users.length == 5)
      {
        this.message="max user atteint";
        this.status= -1
      }
      else
      {
        console.log($event)
        let user = {nom:$event.name,prenom:$event.prenom};
        this.users.push(user);
        this.message="ok";
        this.status=1
      }
      console.log(this.users)
  }
}

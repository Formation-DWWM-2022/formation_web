import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-alerte',
  templateUrl: './alerte.component.html',
  styleUrls: ['./alerte.component.css']
})
export class AlerteComponent implements OnInit {

  @Input('data-message') message;
  @Input('data-status') status;
  constructor() { }

  ngOnInit() {
  }

}

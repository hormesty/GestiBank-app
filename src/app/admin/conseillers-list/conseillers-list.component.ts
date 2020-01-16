import {Component, OnInit } from '@angular/core';
import {Conseiller} from "../../models/conseiller";
import {ConseillerService} from "../../services/ConseillerService";
import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-conseillers-list',
  templateUrl: './conseillers-list.component.html',
  styleUrls: ['./conseillers-list.component.css'],
  providers:[ConseillerService]
})
export class ConseillersListComponent implements OnInit {

  private conseillers: Conseiller[];

  constructor(private serviceConseiller:ConseillerService, private router: Router) { }

  ngOnInit() {
  this.getAllConseillers()}

  gotodetail(matConseiller){
    console.log(">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>"+matConseiller);
    this.router.navigate(['admin/conseiller-list/detail-conseiller',matConseiller]);
  }
  
  gotoupdate(matConseiller){
    console.log(">>>>>>>>>>--update-->>>>>>>>>>>>>>"+matConseiller);
    this.router.navigate(['admin/conseiller-list/update-conseiller',matConseiller]);
  }

  gotonew(){
    console.log(">>>>>>>>>>--add-->>>>>>>>>>>>>>");
   this.router.navigate(['admin/conseiller-list/add-conseiller',]);
  }
  
  getAllConseillers(){
    this.serviceConseiller.findAll().subscribe(
      c => {this.conseillers=c;} );

  }
  
}

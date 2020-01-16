import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Conseiller } from '../../models/conseiller';
import { ConseillerService } from '../../services/ConseillerService';
import {NgForm} from '@angular/forms';@Component({
  selector: 'app-conseiller-update',
  templateUrl: './conseiller-update.component.html',
  styleUrls: ['./conseiller-update.component.css']
})
export class ConseillerUpdateComponent implements OnInit {
  matConseiller: number;
  idUser:number;
  private sub: any;
  conseiller: Conseiller;  
  constructor(private route: ActivatedRoute, private conseillerservice: ConseillerService) { }
  
  ngOnInit() {
    this.sub = this.route.params.subscribe(params => {
      this.matConseiller = +params['id']; // (+) converts string 'id' to a number
      console.log("Id User : " + this.matConseiller);
     // this.updateCons();
     this.getDetailConseiller();
    });
  }
  updateCons(){
    console.log ("lancement de la methode : "+this.conseiller )
      this.conseillerservice.updateConseiller(this.conseiller).subscribe(
      c => {this.conseiller=c}) 
  }  
  
  //recupération de l'obj conseiller a partir de matConseiller
  getDetailConseiller(){
    console.log ("lancement de la methode : "+this.matConseiller )
      this.conseillerservice.findConseillerByMatricule(this.matConseiller).subscribe(
      c => {this.conseiller=c}) 
  }  onFormSubmit(cForm:NgForm){
    console.log(cForm);
    // création d'un conseiller a parti des champs 
    if (cForm.value['CName'])
          this.conseiller.nom=cForm.value['CName'];
    
    if (cForm.value['CPrenom'])
          this.conseiller.prenom=cForm.value['CPrenom'];     
    
    if (cForm.value['CAdresse'])
          this.conseiller.adresse=cForm.value['CAdresse'];
    
    if (cForm.value['CCp'])
          this.conseiller.cp=cForm.value['CCp'];    if (cForm.value['CVille'])      
          this.conseiller.ville=cForm.value['CVille'];    if (cForm.value['CEmail'])
          this.conseiller.email=cForm.value['CEmail'];    if (cForm.value['CTel'])
          this.conseiller.telephone=cForm.value['CTel'];    if (cForm.value['CPseudo'])
          this.conseiller.pseudo=cForm.value['CPseudo'];    if (cForm.value['CMdp'])
          this.conseiller.mdp=cForm.value['CMdp'];    if (cForm.value['CDateFin'])
          this.conseiller.datefin=cForm.value['CDateFin'];    console.log(this.conseiller.id_utilisateur);
    console.log(cForm.value['CName']);
    this.conseillerservice.updateConseiller(this.conseiller).subscribe(
      c => {this.conseiller=c}) 
  }
  
}
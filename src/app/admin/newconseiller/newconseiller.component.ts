import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Conseiller } from '../../models/conseiller';
import { ConseillerService } from '../../services/ConseillerService';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-newconseiller',
  templateUrl: './newconseiller.component.html',
  styleUrls: ['./newconseiller.component.css'],
  providers:[ConseillerService]
})

export class NewconseillerComponent implements OnInit {conseiller:Conseiller = new Conseiller(null, null, null, null, null, null, null, null, null, null, null, null, null, null);
  
  
constructor(private route: ActivatedRoute, private conseillerservice: ConseillerService) { }
  
  
ngOnInit() {
      }
          
  onFormSubmit(cNForm: NgForm) {
    console.log(cNForm);
    // création d'un conseiller a parti des champs 
    if (cNForm.value['CNNom'])
      this.conseiller.nom = cNForm.value['CNNom'];

    if (cNForm.value['CNPrenom'])
      this.conseiller.prenom = cNForm.value['CNPrenom'];

    if (cNForm.value['CNAdresse'])
      this.conseiller.adresse = cNForm.value['CNAdresse'];

    if (cNForm.value['CNCp'])
      this.conseiller.cp = cNForm.value['CNCp'];

    if (cNForm.value['CNVille'])
      this.conseiller.ville = cNForm.value['CNVille']; 
      
    if (cNForm.value['CNEmail'])
      this.conseiller.email = cNForm.value['CNEmail']; 
    
    if (cNForm.value['CNTel'])
      this.conseiller.telephone = cNForm.value['CNTel']; 
      
    if (cNForm.value['CNPseudo'])
      this.conseiller.pseudo = cNForm.value['CNPseudo']; 
    
    if (cNForm.value['CNMdp'])
      this.conseiller.mdp = cNForm.value['CNMdp']; 
    
    if (cNForm.value['CNDateDebut'])
      this.conseiller.mdp = cNForm.value['CNDateDebut']; 
    
    if (cNForm.value['CNDateFin'])
      this.conseiller.datefin = cNForm.value['CNDateFin']; 
    
      console.log(this.conseiller.id_utilisateur);

    console.log(cNForm.value['CNNom']);
    this.conseillerservice.addConseiller(this.conseiller).subscribe(
      c => { this.conseiller = c })
  }



}
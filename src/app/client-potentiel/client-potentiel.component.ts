import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { NgForm } from '@angular/forms';
import { ClientPotentiel } from '../models/clientPotentiel';
import { ClientPotentielService } from 'src/app/services/client-potentiel-service.service';



@Component({
      selector: 'app-client-potentiel',
      templateUrl: './client-potentiel.component.html',
      styleUrls: ['./client-potentiel.component.css'],
      providers: [ClientPotentielService]
})
export class ClientPotentielComponent implements OnInit {
            clientPotentiel: ClientPotentiel = new ClientPotentiel(null, null, null, null, null, null, null, null, null,null, null, null);

      constructor(private route: ActivatedRoute, private clientpotentielservice: ClientPotentielService) { } 
      
      ngOnInit() {
      }
      onFormSubmit(cpForm: NgForm) {
            console.log(cpForm);
            // création d'un conseiller a parti des champs 
            if (cpForm.value['CpNom'])
                  this.clientPotentiel.nom = cpForm.value['CpNom'];

            if (cpForm.value['CpPrenom'])
                  this.clientPotentiel.prenom = cpForm.value['CpPrenom'];

            if (cpForm.value['CpAdresse'])
                  this.clientPotentiel.adresse = cpForm.value['CpAdresse'];

            if (cpForm.value['CpCp'])
                  this.clientPotentiel.cp = cpForm.value['CpCp'];
            if (cpForm.value['CpVille'])
                  this.clientPotentiel.ville = cpForm.value['CpVille'];
            if (cpForm.value['CpEmail'])
                  this.clientPotentiel.email = cpForm.value['CpEmail'];
            if (cpForm.value['CpTel'])
                  this.clientPotentiel.telephone = cpForm.value['CpTel'];
            if (cpForm.value['CpRevenu'])
                  this.clientPotentiel.revenu_mensuel = cpForm.value['CpRevenu'];
            console.log(cpForm.value['CpNom']);
            this.clientpotentielservice.addClientPotentiel(this.clientPotentiel).subscribe(
                  c => { this.clientPotentiel = c })
      }
}
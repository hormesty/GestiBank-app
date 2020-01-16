import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
  // import {NgForm} from '@angular/forms';
  import { ClientPotentiel } from '../../models/clientPotentiel';
import { GestionDemandesServices } from './../../services/gestiondemandesService';

  @Component({
  selector: 'app-gestiondemandes',
  templateUrl: './gestiondemandes.component.html',
  styleUrls: ['./gestiondemandes.component.css'],
  providers:[GestionDemandesServices]
})
export class GestiondemandesComponent implements OnInit {

     
    private clientPotentiel:ClientPotentiel[] ;
    
  constructor(private route: ActivatedRoute, private gestiondemandesservice: GestionDemandesServices) { }
  
    ngOnInit() {
      this.getDemandes()
    }
  
    getDemandes(){
      this.gestiondemandesservice.findAll().subscribe(
        c => {this.clientPotentiel=c;} );
    }
  
   
  }

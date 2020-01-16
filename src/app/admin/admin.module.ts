import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ConseillerUpdateComponent } from './conseiller-update/conseiller-update.component';
// import { ClientPotentielComponent } from './client-potentiel/client-potentiel.component';
import { DemandeouvertureComponent } from './demandeouverture/demandeouverture.component';
import { GestiondemandesComponent } from './gestiondemandes/gestiondemandes.component';
import { ConseillersListComponent } from './../admin/conseillers-list/conseillers-list.component';
import { HomeAdminComponent } from './../admin/home-admin/home-admin.component';
import { ConseillerDetailsComponent } from './../admin/conseiller-details/conseiller-details.component';
import { FormsModule} from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from '../app-routing.module';
import { HttpClientModule } from '@angular/common/http';
import { NewconseillerComponent } from './newconseiller/newconseiller.component';



@NgModule({
  declarations: [ConseillerUpdateComponent, DemandeouvertureComponent, GestiondemandesComponent,ConseillersListComponent,HomeAdminComponent, ConseillersListComponent,ConseillerDetailsComponent, NewconseillerComponent],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    CommonModule,
  ]
})
export class AdminModule { }
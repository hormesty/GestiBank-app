import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ConseillersListComponent } from './admin/conseillers-list/conseillers-list.component';
import { HomeAdminComponent } from './admin/home-admin/home-admin.component';
import { HomeComponent } from './home/home.component';
import { ConseillerDetailsComponent } from './admin/conseiller-details/conseiller-details.component';
import { LoginComponent } from './login/login.component';
import { ClientPotentielComponent } from './client-potentiel/client-potentiel.component';
import { ConseillerUpdateComponent } from './admin/conseiller-update/conseiller-update.component';
import { DemandeouvertureComponent } from './admin/demandeouverture/demandeouverture.component';
import { GestiondemandesComponent } from './admin/gestiondemandes/gestiondemandes.component';
import { NewconseillerComponent } from './admin/newconseiller/newconseiller.component';
import { HomeConseillerComponent } from './conseiller/home-conseiller/home-conseiller.component';
import { HomeClientComponent } from './client/home-client/home-client.component';



const routes: Routes = [
  
  

  //page principale
  { path: 'home', component: HomeComponent},

  //inscription
  { path: 'inscription', component: ClientPotentielComponent },

  //login
  { path: 'login', component: LoginComponent },

  // conseiller
  { path: 'admin', component: HomeAdminComponent, 
                                    children : [{

                                          path: 'conseiller-list', component: ConseillersListComponent ,
                                                    children : [{

                                                            path: 'detail-conseiller/:id', component: ConseillerDetailsComponent
                                                                },  
                                                                
                                                                {  
                                                            path: 'update-conseiller/:id', component: ConseillerUpdateComponent
                                                                },
                                                                {
                                                            path: 'add-conseiller', component: NewconseillerComponent
                                                                },
                                                            ],
                                          
                                                            },
                                                {
                                          path: 'list-demandes', component: DemandeouvertureComponent
                                                } ,
                                                {
                                          path: 'gestion-demandes', component: GestiondemandesComponent
                                                 },
                                                ]
  },

  //conseiller
  {path: 'conseiller', component: HomeConseillerComponent},
  
  //client
  {path: 'client', component: HomeClientComponent},
  


  //redirection
  { path: '', redirectTo: '/home', pathMatch: 'full' },
  // { path: '**', redirectTo: '/login' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

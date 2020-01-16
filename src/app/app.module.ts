import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
// import { ConseillersListComponent } from './admin/conseillers-list/conseillers-list.component';
// import { HomeAdminComponent } from './admin/home-admin/home-admin.component';
// import { ConseillerDetailsComponent } from './admin/conseiller-details/conseiller-details.component';
import { LoginComponent } from './login/login.component';
import { ClientPotentielComponent } from './client-potentiel/client-potentiel.component';
// import { ConseillerUpdateComponent } from './admin/conseiller-update/conseiller-update.component';
import { FormsModule} from '@angular/forms';
// import { DemandeouvertureComponent } from './admin/demandeouverture/demandeouverture.component';
import { AdminModule } from './admin/admin.module';

import { ClientModule } from './client/client.module';
import { ConseillerModule } from './conseiller/conseiller.module';


@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    // ConseillersListComponent,
    // HomeAdminComponent,
    // ConseillerDetailsComponent,
    LoginComponent,
    ClientPotentielComponent,
    // ConseillerUpdateComponent,
    // DemandeouvertureComponent,

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ClientModule,
    ConseillerModule,
    AdminModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

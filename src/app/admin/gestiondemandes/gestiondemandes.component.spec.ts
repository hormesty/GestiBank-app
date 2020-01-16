import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GestiondemandesComponent } from './gestiondemandes.component';

describe('GestiondemandesComponent', () => {
  let component: GestiondemandesComponent;
  let fixture: ComponentFixture<GestiondemandesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GestiondemandesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GestiondemandesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

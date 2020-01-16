import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConseillersListComponent } from './conseillers-list.component';

describe('ConseillersListComponent', () => {
  let component: ConseillersListComponent;
  let fixture: ComponentFixture<ConseillersListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConseillersListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConseillersListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

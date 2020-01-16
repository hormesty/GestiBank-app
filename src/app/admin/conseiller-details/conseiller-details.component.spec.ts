import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConseillerDetailsComponent } from './conseiller-details.component';

describe('ConseillerDetailsComponent', () => {
  let component: ConseillerDetailsComponent;
  let fixture: ComponentFixture<ConseillerDetailsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConseillerDetailsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConseillerDetailsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-2">
        <p class="h1 ms-3">Elements</p>
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills px-3 w-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active text-start text-capitalize" id="accordion" data-bs-toggle="pill" data-bs-target="#accordion_tab" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Accordion</button>
                <button class="nav-link text-start text-capitalize" id="alerts" data-bs-toggle="pill" data-bs-target="#alerts_tab" type="button" role="tab" aria-controls="alerts_tab" aria-selected="false">Alerts</button>
                <button class="nav-link text-start text-capitalize" id="badges" data-bs-toggle="pill" data-bs-target="#badges_tab" type="button" role="tab" aria-controls="badges_tab" aria-selected="false">Badges</button>
                <button class="nav-link text-start text-capitalize" id="breadcrumb" data-bs-toggle="pill" data-bs-target="#breadcrumb_tab" type="button" role="tab" aria-controls="breadcrumb_tab" aria-selected="false">Breadcrumb</button>
                <button class="nav-link text-start text-capitalize" id="button" data-bs-toggle="pill" data-bs-target="#button_tab" type="button" role="tab" aria-controls="button_tab" aria-selected="false">button</button>
                <button class="nav-link text-start text-capitalize" id="Button_group" data-bs-toggle="pill" data-bs-target="#Button_group_tab" type="button" role="tab" aria-controls="Button_group_tab" aria-selected="false">Button group</button>
                <button class="nav-link text-start text-capitalize" id="Cards" data-bs-toggle="pill" data-bs-target="#Cards_tab" type="button" role="tab" aria-controls="Cards_tab" aria-selected="false">Cards</button>
                <button class="nav-link text-start text-capitalize" id="Carousel" data-bs-toggle="pill" data-bs-target="#Carousel_tab" type="button" role="tab" aria-controls="Carousel_tab" aria-selected="false">Carousel</button>
                <button class="nav-link text-start text-capitalize" id="Close_button" data-bs-toggle="pill" data-bs-target="#Close_button_tab" type="button" role="tab" aria-controls="Close_button_tab" aria-selected="false">Close button</button>
                <button class="nav-link text-start text-capitalize" id="Collapse" data-bs-toggle="pill" data-bs-target="#Collapse_tab" type="button" role="tab" aria-controls="Collapse_tab" aria-selected="false">Collapse</button>
                <button class="nav-link text-start text-capitalize" id="Dropdowns" data-bs-toggle="pill" data-bs-target="#Dropdowns_tab" type="button" role="tab" aria-controls="Dropdowns_tab" aria-selected="false">Dropdowns</button>
                <button class="nav-link text-start text-capitalize" id="List_group" data-bs-toggle="pill" data-bs-target="#List_group_tab" type="button" role="tab" aria-controls="List_group_tab" aria-selected="false">List group</button>
                <button class="nav-link text-start text-capitalize" id="Modal" data-bs-toggle="pill" data-bs-target="#Modal_tab" type="button" role="tab" aria-controls="Modal_tab" aria-selected="false">Modal</button>
              </div>
        </div>
    </div>
    <div class="col-10">
        <div class="tab-content pe-4" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="accordion_tab" role="tabpanel" aria-labelledby="accordion">
                <p class="h1">Example</p>
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Accordion Item #1
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Accordion Item #2
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Accordion Item #3
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="tab-pane fade" id="alerts_tab" role="tabpanel" aria-labelledby="alerts">
                <p class="h1">Alerts</p>
                <div class="alert alert-primary" role="alert">
                    A simple primary alert—check it out!
                  </div>
                  <div class="alert alert-secondary" role="alert">
                    A simple secondary alert—check it out!
                  </div>
                  <div class="alert alert-success" role="alert">
                    A simple success alert—check it out!
                  </div>
                  <div class="alert alert-danger" role="alert">
                    A simple danger alert—check it out!
                  </div>
                  <div class="alert alert-warning" role="alert">
                    A simple warning alert—check it out!
                  </div>
                  <div class="alert alert-info" role="alert">
                    A simple info alert—check it out!
                  </div>
                  <div class="alert alert-light" role="alert">
                    A simple light alert—check it out!
                  </div>
                  <div class="alert alert-dark" role="alert">
                    A simple dark alert—check it out!
                  </div>
                  <div class="alert alert-somsri" role="alert">
                    A simple dark alert—check it out!
                  </div>
            </div>
            <div class="tab-pane fade" id="badges_tab" role="tabpanel" aria-labelledby="badges">
                <p class="h1">Badges</p>
                <h1>Example heading <span class="badge bg-secondary">New</span></h1>
                <h2>Example heading <span class="badge bg-secondary">New</span></h2>
                <h3>Example heading <span class="badge bg-secondary">New</span></h3>
                <h4>Example heading <span class="badge bg-secondary">New</span></h4>
                <h5>Example heading <span class="badge bg-secondary">New</span></h5>
                <h6>Example heading <span class="badge bg-secondary">New</span></h6>
                <p class="h1 mt-3">Button with Badges</p>
                <button type="button" class="btn btn-primary">
                    Notifications <span class="badge bg-secondary">4</span>
                  </button>
                <p class="h1 mt-3">Positioned</p>
                <div class="d-inline">
                    <button type="button" class="btn btn-primary position-relative">
                        Inbox
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                          99+
                          <span class="visually-hidden">unread messages</span>
                        </span>
                      </button>
                      <button type="button" class="btn btn-primary position-relative ms-3">
                        Profile
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                          <span class="visually-hidden">New alerts</span>
                        </span>
                      </button>
                </div>
            </div>
            <div class="tab-pane fade" id="breadcrumb_tab" role="tabpanel" aria-labelledby="breadcrumb">
                <p class="h1">Example</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                  </nav>
                  
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                  </nav>
                  
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Library</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <p class="h1 mt-3">Dividers</p>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>
            <div class="tab-pane fade" id="button_tab" role="tabpanel" aria-labelledby="button">
                <p class="h1">Examples</p>
                <div class="d-inline">
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-secondary">Secondary</button>
                    <button type="button" class="btn btn-success">Success</button>
                    <button type="button" class="btn btn-danger">Danger</button>
                    <button type="button" class="btn btn-warning">Warning</button>
                    <button type="button" class="btn btn-info">Info</button>
                    <button type="button" class="btn btn-light">Light</button>
                    <button type="button" class="btn btn-dark">Dark</button>
                    <button type="button" class="btn btn-link">Link</button>
                    <button type="button" class="btn btn-somsri">Link</button>
                </div>
                <p class="h1 mt-3">Outline buttons</p>
                <div class="d-inline">
                    <button type="button" class="btn btn-outline-primary">Primary</button>
                    <button type="button" class="btn btn-outline-secondary">Secondary</button>
                    <button type="button" class="btn btn-outline-success">Success</button>
                    <button type="button" class="btn btn-outline-danger">Danger</button>
                    <button type="button" class="btn btn-outline-warning">Warning</button>
                    <button type="button" class="btn btn-outline-info">Info</button>
                    <button type="button" class="btn btn-outline-light">Light</button>
                    <button type="button" class="btn btn-outline-dark">Dark</button>
                    <button type="button" class="btn btn-outline-somsri">Dark</button>
                </div>
                <p class="h1 mt-3">Sizes</p>
                <div class="d-inline">
                    <button type="button" class="btn btn-primary btn-lg">Large button</button>
                    <button type="button" class="btn btn-primary">Normal button</button>
                    <button type="button" class="btn btn-primary btn-sm">Small button</button>
                </div>
                <p class="h1 mt-3">Disabled state</p>
                <div class="d-inline">
                    <button type="button" class="btn btn-primary" disabled>Primary</button>
                    <button type="button" class="btn btn-secondary" disabled>Secondary</button>
                    <button type="button" class="btn btn-success" disabled>Success</button>
                    <button type="button" class="btn btn-danger" disabled>Danger</button>
                    <button type="button" class="btn btn-warning" disabled>Warning</button>
                    <button type="button" class="btn btn-info" disabled>Info</button>
                    <button type="button" class="btn btn-light" disabled>Light</button>
                    <button type="button" class="btn btn-dark" disabled>Dark</button>
                    <button type="button" class="btn btn-link" disabled>Link</button>
                    <button type="button" class="btn btn-somsri" disabled>Link</button>
                </div>
                <p class="h1 mt-3">Block buttons</p>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button">Button</button>
                    <button class="btn btn-primary" type="button">Button</button>
                </div>
                <p class="h1 mt-3">Toggle states</p>
                <div>
                    <div class="d-block">
                        <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off">Toggle button</button>
                        <button type="button" class="btn btn-primary active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
                        <button type="button" class="btn btn-primary" disabled data-bs-toggle="button" autocomplete="off">Disabled toggle button</button>
                    </div>
                    <div class="d-block mt-1">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="button" autocomplete="off">Toggle button</button>
                        <button type="button" class="btn btn-secondary active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
                        <button type="button" class="btn btn-secondary" disabled data-bs-toggle="button" autocomplete="off">Disabled toggle button</button>
                    </div>
                    <div class="d-block mt-1">
                        <button type="button" class="btn btn-success" data-bs-toggle="button" autocomplete="off">Toggle button</button>
                        <button type="button" class="btn btn-success active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
                        <button type="button" class="btn btn-success" disabled data-bs-toggle="button" autocomplete="off">Disabled toggle button</button>
                    </div>
                    <div class="d-block mt-1">
                        <button type="button" class="btn btn-danger" data-bs-toggle="button" autocomplete="off">Toggle button</button>
                        <button type="button" class="btn btn-danger active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
                        <button type="button" class="btn btn-danger" disabled data-bs-toggle="button" autocomplete="off">Disabled toggle button</button>
                    </div>
                    <div class="d-block mt-1">
                        <button type="button" class="btn btn-warning" data-bs-toggle="button" autocomplete="off">Toggle button</button>
                        <button type="button" class="btn btn-warning active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
                        <button type="button" class="btn btn-warning" disabled data-bs-toggle="button" autocomplete="off">Disabled toggle button</button>
                    </div>
                    <div class="d-block mt-1">
                        <button type="button" class="btn btn-info" data-bs-toggle="button" autocomplete="off">Toggle button</button>
                        <button type="button" class="btn btn-info active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
                        <button type="button" class="btn btn-info" disabled data-bs-toggle="button" autocomplete="off">Disabled toggle button</button>
                    </div>
                    <div class="d-block mt-1">
                        <button type="button" class="btn btn-light" data-bs-toggle="button" autocomplete="off">Toggle button</button>
                        <button type="button" class="btn btn-light active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
                        <button type="button" class="btn btn-light" disabled data-bs-toggle="button" autocomplete="off">Disabled toggle button</button>
                    </div>
                    <div class="d-block mt-1">
                        <button type="button" class="btn btn-dark" data-bs-toggle="button" autocomplete="off">Toggle button</button>
                        <button type="button" class="btn btn-dark active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
                        <button type="button" class="btn btn-dark" disabled data-bs-toggle="button" autocomplete="off">Disabled toggle button</button>
                    </div>
                    <div class="d-block mt-1">
                        <button type="button" class="btn btn-link" data-bs-toggle="button" autocomplete="off">Toggle button</button>
                        <button type="button" class="btn btn-link active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
                        <button type="button" class="btn btn-link" disabled data-bs-toggle="button" autocomplete="off">Disabled toggle button</button>
                    </div>
                    <div class="d-block mt-1">
                      <button type="button" class="btn btn-somsri" data-bs-toggle="button" autocomplete="off">Toggle button</button>
                      <button type="button" class="btn btn-somsri active" data-bs-toggle="button" autocomplete="off" aria-pressed="true">Active toggle button</button>
                      <button type="button" class="btn btn-somsri" disabled data-bs-toggle="button" autocomplete="off">Disabled toggle button</button>
                  </div>
                </div>
            </div>
            <div class="tab-pane fade" id="Button_group_tab" role="tabpanel" aria-labelledby="Button_group">
              <p class="h1">Basic example</p>
              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary">Left</button>
                <button type="button" class="btn btn-primary">Middle</button>
                <button type="button" class="btn btn-primary">Right</button>
              </div>
              <p class="h1">Mixed styles</p>
              <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <button type="button" class="btn btn-danger">Left</button>
                <button type="button" class="btn btn-warning">Middle</button>
                <button type="button" class="btn btn-success">Right</button>
              </div>
              <p class="h1">Outlined styles</p>
              <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn btn-outline-primary">Left</button>
                <button type="button" class="btn btn-outline-primary">Middle</button>
                <button type="button" class="btn btn-outline-primary">Right</button>
              </div>
              <p class="h1">Checkbox and radio button groups</p>
              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck1">Checkbox 1</label>
              
                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck2">Checkbox 2</label>
              
                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck3">Checkbox 3</label>
              </div>
              <p class="h1">Button toolbar</p>
              <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                  <button type="button" class="btn btn-primary">1</button>
                  <button type="button" class="btn btn-primary">2</button>
                  <button type="button" class="btn btn-primary">3</button>
                  <button type="button" class="btn btn-primary">4</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                  <button type="button" class="btn btn-secondary">5</button>
                  <button type="button" class="btn btn-secondary">6</button>
                  <button type="button" class="btn btn-secondary">7</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                  <button type="button" class="btn btn-info">8</button>
                </div>
              </div>
              <p class="h1">Sizing</p>
              <div>
                <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary">Left</button>
                  <button type="button" class="btn btn-primary">Middle</button>
                  <button type="button" class="btn btn-primary">Right</button>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary">Left</button>
                  <button type="button" class="btn btn-primary">Middle</button>
                  <button type="button" class="btn btn-primary">Right</button>
                </div>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary">Left</button>
                  <button type="button" class="btn btn-primary">Middle</button>
                  <button type="button" class="btn btn-primary">Right</button>
                </div>
              </div>
              <p class="h1">Nesting</p>
              <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-primary">1</button>
                <button type="button" class="btn btn-primary">2</button>
              
                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                  </ul>
                </div>
              </div>
              <p class="h1">Vertical variation</p>
              <div class="btn-group-vertical" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary">Left</button>
                <button type="button" class="btn btn-primary">Middle</button>
                <button type="button" class="btn btn-primary">Right</button>
              </div>
            </div>
            <div class="tab-pane fade" id="Cards_tab" role="tabpanel" aria-labelledby="Cards">
              <p class="h1">Example</p>
              <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <p class="h1">Content types - Body</p>
              <div class="card">
                <div class="card-body">
                  This is some text within a card body.
                </div>
              </div>
              <p class="h1">Content types - Titles, text, and links</p>
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>
              <p class="h1">Content types - Images</p>
              <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <p class="h1">Content types - List groups</p>
              <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">An item</li>
                  <li class="list-group-item">A second item</li>
                  <li class="list-group-item">A third item</li>
                </ul>
              </div>
              <p class="h1">Content types - Kitchen sink</p>
              <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">An item</li>
                  <li class="list-group-item">A second item</li>
                  <li class="list-group-item">A third item</li>
                </ul>
                <div class="card-body">
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>
              <p class="h1">Content types - Header and footer</p>
              <div class="card">
                <div class="card-header">
                  Featured
                </div>
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <p class="h1">Sizing - Using grid markup</p>
              <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
              </div>
              <p class="h1">Sizing - Using utilities</p>
              <div class="card w-75">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Button</a>
                </div>
              </div>
              
              <div class="card w-50">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Button</a>
                </div>
              </div>
              <p class="h1">Sizing - Using custom CSS</p>
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <p class="h1">Text alignment</p>
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              
              <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              
              <div class="card text-end" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <p class="h1">Navigation</p>
              <div class="card text-center">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="true" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled">Disabled</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <p class="h1">Images - Image caps</p>
              <div class="card mb-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                <img src="..." class="card-img-bottom" alt="...">
              </div>
              <p class="h1">Images - Image overlays</p>
              <div class="card bg-dark text-white">
                <img src="..." class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text">Last updated 3 mins ago</p>
                </div>
              </div>
              <p class="h1">Horizontal</p>
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
              </div>
              <p class="h1">Card styles - Background and color</p>
              <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Primary card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Secondary card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Success card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Danger card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Warning card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card text-dark bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Info card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Light card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Dark card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card text-white bg-somsri mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Dark card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <p class="h1">Card styles - Border</p>
              <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body text-primary">
                  <h5 class="card-title">Primary card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body text-secondary">
                  <h5 class="card-title">Secondary card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body text-success">
                  <h5 class="card-title">Success card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card border-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body text-danger">
                  <h5 class="card-title">Danger card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card border-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Warning card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card border-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Info card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card border-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                  <h5 class="card-title">Light card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body text-dark">
                  <h5 class="card-title">Dark card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="card border-somsri mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body text-dark">
                  <h5 class="card-title">Dark card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <p class="h1">Card styles - Mixins utilities</p>
              <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-success">Header</div>
                <div class="card-body text-success">
                  <h5 class="card-title">Success card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-footer bg-transparent border-success">Footer</div>
              </div>
              <p class="h1">Card layout - Card groups</p>
              <div class="card-group">
                <div class="card">
                  <img src="..." class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                  <img src="..." class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                  <img src="..." class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
              <p class="h1">Card layout - Grid cards</p>
              <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                  <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="Carousel_tab" role="tabpanel" aria-labelledby="Carousel">...</div>
            <div class="tab-pane fade" id="Close_button_tab" role="tabpanel" aria-labelledby="Close_button">...</div>
            <div class="tab-pane fade" id="Collapse_tab" role="tabpanel" aria-labelledby="Collapse">...</div>
            <div class="tab-pane fade" id="Dropdowns_tab" role="tabpanel" aria-labelledby="Dropdowns">...</div>
            <div class="tab-pane fade" id="List_group_tab" role="tabpanel" aria-labelledby="List_group">...</div>
            <div class="tab-pane fade" id="Modal_tab" role="tabpanel" aria-labelledby="Modal">...</div>
            <div class="tab-pane fade" id="breadcrumb_tab" role="tabpanel" aria-labelledby="breadcrumb">...</div>
            <div class="tab-pane fade" id="breadcrumb_tab" role="tabpanel" aria-labelledby="breadcrumb">...</div>
            <div class="tab-pane fade" id="breadcrumb_tab" role="tabpanel" aria-labelledby="breadcrumb">...</div>
          </div>
    </div>
</div>
@endsection
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./resources/bootstrap/css/bootstrap.min.css">
        <link rel="icon" type="image/gif" href="111.png">
        <style>
            body{
                height: 100vh;
                width: 100vw;
            } 
            img{
                
            } 
        </style>
        <title>Escolarite</title>
    </head>
    <body>
        <div class="container h-100 w-100 d-flex">
            <div class="col col-6 bg-light p-5 m-auto">
                <div class ="text-center" > 
                    <img src="111.png" alt=""  height="150px" class="rounded">
                </div>
            <span class="bg-primary text-xl row mb-5 text-white text-center justify-content-center fw-bold fs-3">SERVICE ESCOLARITE</span>
            <button type="button" class="btn btn-danger w-100 btn-block p-3" id="error" name="error" >Wrong Credentials!</button>
            <button type="button" class="btn btn-success w-100 btn-block p-3" id="success" name="success" >Success!</button>
               
                <form id="loginform" name="loginform">
                    
                    <div class="mb-3 row">
                        <label for="emailAddress" class="form-label">Email address</label>
                        <input required placeholder="ahmed@gmail.com" type="email" class="form-control" id="emailAddress" name="emailAddress" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3 row">
                        <label for="cinNumber" class="form-label">CIN Number</label>
                        <input required placeholder="A001122" type="text" class="form-control" name="cinNumber" id="cinNumber" >
                    </div>
                    <div class="mb-3 row">
                        <label for="apoge" class="form-label">Apoge</label>
                        <input required placeholder="12345" type="number" class="form-control" name="apoge" id="apoge">
                    </div>
                    <button type="submit" id="login-submit" name="login-submit" class="btn btn-block btn-primary w-100 rounded-pill">Login</button>
                </form>
                <div class="mt-2" id="selection">
                    
                    <span class="fs-4">Veuillez choisir votre document :</span>
                    <div class="gap-2 d-grid row mx-auto pt-3">
                        <div class="col d-flex w-100">
                           <button class="btn btn-light border-primary w-100 fs-5 m-1 selectable" type="button" name="scolarite" id="scolarite">Attestation de Scolarite</button>
                            
                            <button class="btn btn-light border-primary w-100 fs-5 m-1 selectable" type="button" name="convention" id="convention">Convention de stage</button>
                            
                        </div>
                        <div class="col d-flex w-100">
                           <button class="btn btn-light border-primary w-100 fs-5 m-1 selectable" type="button" name="demande" id="demande" >Demande de stage</button>
                           
                            <button class="btn btn-light border-primary w-100 fs-5 m-1 selectable" type="button" name="releve" id="releve">Releve de note</button>

                        </div>
                        <div class="col d-flex w-100">
                            <button class="btn btn-light border-primary w-100 fs-5 col m-1 selectable" type="button" name="reussite" id="reussite">Attestation de reussite</button>
                        </div>

                    </div>
                </div>
                <form class="m-1 pt-3" name="releve_form" id="releve_form">
                <select class="form-select" id="notes" aria-label="Releve De Notes Pour:">
                    <option value="1">C1</option>
                    <option value="2">C2</option>
                    <option value="3">C3</option>
                </select>
                </form>
                <form class="mt-2" id="convention_form" name="convention_form">
                    
                <div class="mb-3 row pt-3 row mx-auto">
                    <label for="entreprise" class="form-label fs-4">Nom Entreprise :</label>
                    <input required placeholder="Entrer le nome d'entreprise" type="text" class="form-control" id="entreprise" name="entreprise" >
                </div>
                <div class="mb-3 row pt-3 row mx-auto">
                    <label for="debut">Date Debut</label>
                    <input required placeholder="" type="date" id="debut" name="debut">
                </div>
                <div class="mb-3 row pt-3 row mx-auto">
                    <label for="fin" class="form-label fs-4">Date Debut</label>
                    <input required placeholder="" type="date" id="fin" name="fin" class="form-control">
                </div>
                <div class="mb-3 row pt-3 row mx-auto">
                    <label for="type" class="form-label fs-4">Type De Stage :</label>
                    <select class="form-select" id="type" name="type" aria-label="Type de stage">
                        <option value="PFE">PFE</option>
                        <option value="PFA">PFA</option>
                        <option value="Stage Observation">Stage Observation</option>
                    </select>
                </div>
                <div class="mb-3 row pt-3 row mx-auto">
                    <label for="filiere" class="form-label fs-4">Filiere :</label>
                    <input required placeholder="Entrer votre Filiere" type="text" class="form-control" id="filiere" name="filiere" />
                </div>
                </form>
                <div class="d-flex w-100 justify-content-end">
                    <button type="submit" class="btn btn-primary m-2 px-5" id="envoyer">Envoyer</button>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="./resources/bootsrap/js/bootstrap.min.js"></script>
        <script src="./index.js" defer></script>
        
    </body>
</html>
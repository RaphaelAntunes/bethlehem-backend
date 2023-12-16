<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">E-mails selecionados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="containerpages">
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <div class="d-flex align-items-center justify-content-center">
                    <button id="leftpagebtn" onclick="pagina_anterior()" class="btn btn-danger">
                        < </button>
                            <h5 id="countpaginate" style="margin: 0px;">1/33</h5>
                            <button id="nextpagebtn" onclick="proxima_pagina()" class="btn btn-danger"> >
                            </button>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
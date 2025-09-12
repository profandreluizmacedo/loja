   function modalAlerta(titulo, mensagem) {
    // Verifica se o modal já existe, senão cria
    if ($("#msgAlerta").length === 0) {
        $("body").append(`
            <div id="msgAlerta" class="modal fade" tabindex="-1" aria-labelledby="msgAlertaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="msgAlertaLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                  </div>
                  <div class="modal-body"></div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                  </div>
                </div>
              </div>
            </div>
        `);
    }
    // Atualiza título e mensagem
    $("#msgAlerta .modal-title").text(titulo);
    $("#msgAlerta .modal-body").html(mensagem);

    // Exibe o modal
    var modal = new bootstrap.Modal(document.getElementById('msgAlerta'));
    modal.show();
}
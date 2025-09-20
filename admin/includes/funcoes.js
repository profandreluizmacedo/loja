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


function modalPergunta(titulo, pergunta) {
    return new Promise((resolve) => {
        // Remover qualquer modal existente
        $('#dynamicModal').remove();

        // Criar o modal dinamicamente
        var modalHtml = `
            <div class="modal fade" id="dynamicModal" tabindex="-1" aria-labelledby="dynamicModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dynamicModalLabel">${titulo}</h5>
                
                        </div>
                        <div class="modal-body">
                            ${pergunta}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="modalCancel" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="modalOk">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>`;

        // Adicionar o modal ao body
        $('body').append(modalHtml);

        // Exibir o modal
        $('#dynamicModal').modal('show');

        // Evento para o botão "OK"
        $('#modalOk').on('click', function () {
            resolve(true); // Retorna true
            $('#dynamicModal').modal('hide'); // Fecha o modal
        });

        // Evento para o botão "Cancelar"
        $('#modalCancel, .close').on('click', function () {
            resolve(false); // Retorna false
            $('#dynamicModal').modal('hide'); // Fecha o modal
        });

        // Remover o modal da DOM após fechar
        $('#dynamicModal').on('hidden.bs.modal', function () {
            $(this).remove();
        });
    });
}
<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-user-edit me-2"></i>Редактирование клиента</h2>
        <a href="index.php?entity=client&action=show&id=<?= $client['ClientID'] ?>" class="btn btn-outline-secondary">
            <i class="fas fa-times me-1"></i> Отмена
        </a>
    </div>

    <form method="POST" action="index.php?entity=client&action=edit&id=<?= $client['ClientID'] ?>">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Основная информация</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">ФИО <span class="text-danger">*</span></label>
                    <input type="text" name="FullName" class="form-control" value="<?= $client['FullName'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Статус</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="IsLoyal" id="isLoyal"
                            <?= $client['IsLoyal'] ? 'checked' : '' ?>>
                        <label class="form-check-label" for="isLoyal">Постоянный клиент</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h3 class="card-title mb-0">Паспортные данные</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Внутренний паспорт</label>
                    <input type="text" name="DomesticPassport" class="form-control"
                        value="<?= $client['DomesticPassport'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Загранпаспорт</label>
                    <input type="text" name="InternationalPassport" class="form-control"
                        value="<?= $client['InternationalPassport'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Информация о визе</label>
                    <input type="text" name="VisaInfo" class="form-control" value="<?= $client['VisaInfo'] ?>">
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-warning btn-lg">
                <i class="fas fa-save me-1"></i> Сохранить изменения
            </button>
        </div>
    </form>
</div>
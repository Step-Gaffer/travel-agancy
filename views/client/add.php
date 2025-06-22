<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-user-plus me-2"></i>Добавление нового клиента</h2>
        <a href="index.php?entity=client&action=list" class="btn btn-outline-secondary">
            <i class="fas fa-times me-1"></i> Отмена
        </a>
    </div>

    <form method="POST" action="index.php?entity=client&action=add">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Основная информация</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">ФИО <span class="text-danger">*</span></label>
                    <input type="text" name="FullName" class="form-control" required>
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
                    <input type="text" name="DomesticPassport" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Загранпаспорт</label>
                    <input type="text" name="InternationalPassport" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Информация о визе</label>
                    <input type="text" name="VisaInfo" class="form-control">
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success btn-lg">
                <i class="fas fa-save me-1"></i> Добавить клиента
            </button>
        </div>
    </form>
</div>
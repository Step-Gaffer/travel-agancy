<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-user me-2"></i>Профиль клиента</h2>
        <a href="index.php?entity=client&action=list" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-1"></i> Назад к списку
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">Основная информация</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">ID клиента:</div>
                        <div class="col-md-8"><?= $client['ClientID'] ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">ФИО:</div>
                        <div class="col-md-8"><?= $client['FullName'] ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Статус:</div>
                        <div class="col-md-8">
                            <?php if ($client['IsLoyal']): ?>
                                <span class="badge bg-success">Постоянный клиент</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Новый клиент</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0">Документы</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Внутренний паспорт:</div>
                        <div class="col-md-8"><?= $client['DomesticPassport'] ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Загранпаспорт:</div>
                        <div class="col-md-8"><?= $client['InternationalPassport'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 fw-bold">Информация о визе:</div>
                        <div class="col-md-8"><?= $client['VisaInfo'] ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h3 class="card-title mb-0">Действия</h3>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="index.php?entity=client&action=edit&id=<?= $client['ClientID'] ?>"
                            class="btn btn-warning mb-2">
                            <i class="fas fa-edit me-1"></i> Редактировать профиль
                        </a>
                        <a href="index.php?entity=client&action=delete&id=<?= $client['ClientID'] ?>"
                            class="btn btn-danger"
                            onclick="return confirm('Вы уверены? Удаление клиента также удалит все связанные бронирования!')">
                            <i class="fas fa-trash me-1"></i> Удалить клиента
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-plane-departure me-2"></i>Информация о поездке</h2>
        <a href="index.php?entity=trip&action=list" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-1"></i> Назад к списку
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">Детали поездки</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">ID поездки:</div>
                        <div class="col-md-9"><?= $trip['TripID'] ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">Тур:</div>
                        <div class="col-md-9">
                            <?= $trip['Cities'] ?> (<?= $trip['Countries'] ?>)
                            <div class="small"><?= $trip['Purpose'] ?></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">Дата отправления:</div>
                        <div class="col-md-9"><?= date('d.m.Y', strtotime($trip['DepartureDate'])) ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 fw-bold">Номер рейса:</div>
                        <div class="col-md-9"><?= $trip['FlightNumber'] ?></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0">Статус</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <?php if ($trip['IsHot']): ?>
                                <span class="badge bg-danger p-2 fs-6">Горящая путёвка</span>
                            <?php else: ?>
                                <span class="badge bg-success p-2 fs-6">Доступна</span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <?php if ($trip['IsHot']): ?>
                                <p class="mb-0">До отъезда осталось менее 3 дней! Скидка 15%</p>
                            <?php else: ?>
                                <p class="mb-0">Путёвка доступна для бронирования</p>
                            <?php endif; ?>
                        </div>
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
                        <a href="index.php?entity=trip&action=edit&id=<?= $trip['TripID'] ?>"
                            class="btn btn-warning mb-2">
                            <i class="fas fa-edit me-1"></i> Редактировать
                        </a>
                        <a href="index.php?entity=booking&action=add&trip_id=<?= $trip['TripID'] ?>"
                            class="btn btn-success mb-2">
                            <i class="fas fa-ticket-alt me-1"></i> Оформить бронь
                        </a>
                        <a href="index.php?entity=trip&action=delete&id=<?= $trip['TripID'] ?>" class="btn btn-danger"
                            onclick="return confirm('Вы уверены? Удаление поездки также удалит все связанные бронирования!')">
                            <i class="fas fa-trash me-1"></i> Удалить
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
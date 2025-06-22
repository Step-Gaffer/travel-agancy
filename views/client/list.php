<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-users me-2"></i>Список клиентов</h2>
        <a href="index.php?entity=client&action=add" class="btn btn-success">
            <i class="fas fa-plus me-1"></i> Добавить клиента
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Внутренний паспорт</th>
                    <th>Загранпаспорт</th>
                    <th>Виза</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?= $client['ClientID'] ?></td>
                        <td><?= $client['FullName'] ?></td>
                        <td><?= $client['DomesticPassport'] ?></td>
                        <td><?= $client['InternationalPassport'] ?></td>
                        <td><?= $client['VisaInfo'] ?></td>
                        <td>
                            <?php if ($client['IsLoyal']): ?>
                                <span class="badge bg-success">Постоянный</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Новый</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?entity=client&action=show&id=<?= $client['ClientID'] ?>"
                                    class="btn btn-sm btn-primary" title="Просмотр">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="index.php?entity=client&action=edit&id=<?= $client['ClientID'] ?>"
                                    class="btn btn-sm btn-warning" title="Редактировать">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?entity=client&action=delete&id=<?= $client['ClientID'] ?>"
                                    class="btn btn-sm btn-danger" title="Удалить"
                                    onclick="return confirm('Вы уверены? Удаление клиента также удалит все связанные бронирования!')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
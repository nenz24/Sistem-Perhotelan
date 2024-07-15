<?php
//namespace App\Exports;
//
//use Maatwebsite\Excel\Concerns\FromMultipleSheets;
//use Maatwebsite\Excel\Concerns\WithTitle;
//use Illuminate\Support\Collection;
//
//class ReportExport implements FromMultipleSheets
//{
//    protected $data;
//
//    public function __construct($data)
//    {
//        $this->data = $data;
//    }
//
//    public function sheets(): array
//    {
//        return [
//            new IncomeSheet($this->data),
//            new PayrollSheet($this->data),
//        ];
//    }
//}
//
//class IncomeSheet implements FromCollection, WithTitle
//{
//    protected $data;
//
//    public function __construct($data)
//    {
//        $this->data = $data;
//    }
//
//    public function collection()
//    {
//        $collection = new Collection([
//            ['Floor', request('floor')],
//            ['Room Type', request('type')],
//            ['Month', request('month')],
//            ['Income', $this->data['income']],
//        ]);
//
//        $collection->push([]);
//        $collection->push(['Room', 'Check-In Date', 'Check-Out Date', 'Payment']);
//
//        foreach ($this->data['incomeData'] as $transaction) {
//            $collection->push([
//                $transaction->room->name_room,
//                $transaction->checkIn_date,
//                $transaction->checkOut_date,
//                $transaction->payment,
//            ]);
//        }
//
//        return $collection;
//    }
//
//    public function title(): string
//    {
//        return 'Income Report';
//    }
//}
//
//class PayrollSheet implements FromCollection, WithTitle
//{
//    protected $data;
//
//    public function __construct($data)
//    {
//        $this->data = $data;
//    }
//
//    public function collection()
//    {
//        $collection = new Collection([
//            ['Job Name', request('job_name')],
//            ['Payroll', $this->data['payroll']],
//        ]);
//
//        $collection->push([]);
//        $collection->push(['Worker', 'Job']);
//
//        foreach ($this->data['payrollData'] as $worker) {
//            $collection->push([
//                $worker->name_worker,
//                $worker->job->name_job,
//            ]);
//        }
//
//        return $collection;
//    }
//
//    public function title(): string
//    {
//        return 'Payroll Report';
//    }
//}

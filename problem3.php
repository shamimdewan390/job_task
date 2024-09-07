<?php

// Function to calculate total payroll for a list of employees
function calculatePayroll(array $employees): int {
    $totalPayroll = 0;

    // Iterate over each employee
    foreach ($employees as $employee) {
        $regularHours = min(40, $employee['hours_worked']);
        $overtimeHours = max(0, $employee['hours_worked'] - 40);

        
        // Calculate regular pay
        $regularPay = $regularHours * $employee['hourly_rate'];
        
        // Calculate overtime pay at 1.5x the hourly rate
        $overtimePay = $overtimeHours * $employee['hourly_rate'] * 1.5;
        
        // Add to total payroll
        $totalPayroll += ($regularPay + $overtimePay);
    }

    // Return the total payroll amount
    return (int)$totalPayroll;
}

// Sample usage
$employees = [
    ['name' => 'shamim', 'hourly_rate' => 20, 'hours_worked' => 45],
    ['name' => 'ahamad', 'hourly_rate' => 15, 'hours_worked' => 38],
    ['name' => 'dewan', 'hourly_rate' => 25, 'hours_worked' => 50]
];


$totalPayroll = calculatePayroll($employees);

echo "Total Payroll: $" . $totalPayroll;

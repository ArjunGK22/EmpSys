<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use \Codedge\Fpdf\Fpdf\Fpdf;
use DateTime;
use DateTimeImmutable;
use PhpParser\Node\Stmt\Return_;

class PdfController extends Controller
{
    //

    public function generateBioData(\Codedge\Fpdf\Fpdf\Fpdf $pdf, $id)
    {

        $employee = Employee::with('families', 'educations', 'experiences')->find($id);

        //Personal Data
        $personalDetails = [
            'Name' => $employee['first_name'] . " " . $employee['last_name'],
            'Date of Birth' => (new DateTime($employee['date_of_birth']))->format('d-m-Y'),
            'Gender' => ucwords($employee['gender']),
            'Address' => $employee['address'] . " " . $employee['city'] . " " . $employee['state'],
            'Pincode' => $employee['pincode'],
            'Email' => $employee['email'],
            'Phone' => $employee['phone_number'],
            'Start Date' => (new DateTime($employee['start_date']))->format('d-m-Y'),
            'Department' => $employee['department'],
            'Position' => $employee['position'],
        ];

        // Create an instance of FPDF
        $pdf->AddPage();

        // Helper function for section headers
        $sectionHeader = function ($title) use ($pdf) {
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, $title, 0, 1, 'L');
            $pdf->Ln(5);
        };


        //Helper function
        $addDetails = function ($details) use ($pdf) {
            $pdf->SetFont('Arial', '', 12);
            foreach ($details as $key => $value) {
                $pdf->Cell(50, 10, $key . ':', 0);
                $pdf->Cell(0, 10, $value, 0, 1);
            }
            $pdf->Ln(10);
        };

        // Add sections to the PDF
        $sectionHeader('Personal Details');
        $addDetails($personalDetails);

        $sectionHeader('Education Details');
        $columnWidths = [
            'Sl No' => 10,
            'Degree' => 0,  // Will be dynamically calculated
            'Institution' => 0,  // Will be dynamically calculated
            'Completion Year' => 0,  // Will be dynamically calculated
            'Aggregate' => 0,  // Will be dynamically calculated
        ];

        // Define the table headers and calculate column widths
        foreach ($columnWidths as $header => $width) {
            $width = max($pdf->GetStringWidth($header) + 6, $width);
            $columnWidths[$header] = $width;
            $pdf->Cell($width, 10, $header, 1);
        }
        $pdf->Ln();
        $educationDetails = json_decode($employee['educations'], true);
        $count = 1;
        foreach ($educationDetails as $edu) {
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell($columnWidths['Sl No'], 10, $count++, 1); // Increment sl no and display
            $pdf->Cell($columnWidths['Degree'], 10, $edu['degree'], 1);
            $pdf->Cell($columnWidths['Institution'], 10, $edu['institution'], 1);
            $pdf->Cell($columnWidths['Completion Year'], 10, 'Kristu Jayanti College', 1);
            $pdf->Cell($columnWidths['Aggregate'], 10, $edu['aggregate'], 1);
            $pdf->Ln(); // Move to the next line
        }

        $sectionHeader('Previous Experience');
        $pdf->Cell(10, 10, 'Sl#', 1);
        $pdf->Cell(40, 10, 'Company Name', 1);
        $pdf->Cell(30, 10, 'Position', 1);
        $pdf->Cell(30, 10, 'Experience', 1);
        $pdf->Ln(); // Move to the next line
        $experienceDetails = json_decode($employee['experiences'], true);
        $count = 1;
        foreach ($experienceDetails as $exp) {
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(10, 10, $count++, 1);
            $pdf->Cell(30, 10, $exp['company_name'], 1);
            $pdf->Cell(30, 10, $exp['position'], 1);
            $pdf->Cell(40, 10, $exp['year_of_exp'], 1);
            $pdf->Ln(); // Move to the next line
        }


        $pdf->Ln(10);
        // Define the table headers 
        $sectionHeader('Family Details');
        $pdf->Cell(10, 10, 'Sl#', 1);
        $pdf->Cell(40, 10, 'Name', 1);
        $pdf->Cell(30, 10, 'Relationship', 1);
        $pdf->Cell(30, 10, 'DOB', 1);
        $pdf->Cell(40, 10, 'Occupation', 1);
        $pdf->Ln(); // Move to the next line
        $familyDetails = json_decode($employee['families'], true);
        $count = 1;
        foreach ($familyDetails as $employee) {
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(10, 10, $count++, 1);
            $pdf->Cell(40, 10, $employee['first_name'] . " " . $employee['last_name'], 1);
            $pdf->Cell(30, 10, $employee['relationship'], 1);
            $pdf->Cell(30, 10, $employee['rel_dob'], 1);
            $pdf->Cell(40, 10, $employee['occupation'], 1);
            $pdf->Ln(); // Move to the next line
        }


        // Output the PDF
        return response($pdf->Output(), 200)
            ->header('Content-Type', 'application/pdf');

        exit;
    }

    public function generateBioData1(\Codedge\Fpdf\Fpdf\Fpdf $fpdf, $id)
    {

        // Fetch employee data from the database
        $employee = Employee::with('families', 'educations', 'experiences')->find($id);

        // Create an instance of FPDF
        $pdf = new Fpdf();

        // Add a page to the PDF
        $pdf->AddPage();

        // Set font for the bio data
        $pdf->SetFont('Arial', 'B', 16);

        // Add bio data section at the top of the page
        $pdf->SetFillColor(200, 220, 255); // Set background color
        $pdf->Rect(0, 0, $pdf->GetPageWidth(), 20, 'F'); // Draw a rectangle as the background
        $pdf->Cell(0, 10, 'Employee Bio Data', 0, 1, 'C');
        $pdf->Ln(10);

        // Set font for the personal details
        $pdf->SetFont('Arial', 'B', 12);

        // Personal Data
        $personalDetails = [
            'Name' => $employee['first_name'] . " " . $employee['last_name'],
            'Date of Birth' => (new DateTime($employee['date_of_birth']))->format('d-m-Y'),
            'Gender' => ucwords($employee['gender']),
            'Address' => $employee['address'] . " " . $employee['city'] . " " . $employee['state'],
            'Pincode' => $employee['pincode'],
            'Email' => $employee['email'],
            'Phone' => $employee['phone_number'],
            'Join Date' => (new DateTime($employee['start_date']))->format('d-m-Y'),
            'Department' => $employee['department'],
            'Position' => $employee['position'],
        ];

        // Helper function for section headers
        $sectionHeader = function ($title) use ($pdf) {
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Cell(0, 10, $title, 0, 1, 'L');
            $pdf->Ln(2);
        };

        // Helper function for details
        $addDetails = function ($details) use ($pdf) {
            $pdf->SetFont('Arial', '', 12);
            foreach ($details as $key => $value) {
                $pdf->Cell(50, 10, $key . ':', 0);
                $pdf->Cell(0, 10, $value, 0, 1);
            }
            $pdf->Ln(10);
        };

        // Add sections to the PDF
        $sectionHeader('Personal Details');
        $addDetails($personalDetails);


        $sectionHeader('Education Details');
        $pdf->Line(10, $pdf->GetY(), $pdf->GetPageWidth() - 10, $pdf->GetY());
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Cell(10, 10, 'Sl#', 1);
        $pdf->Cell(40, 10, 'Degree', 1);
        $pdf->Cell(50, 10, 'Institution', 1);
        $pdf->Cell(30, 10, 'Year', 1);
        $pdf->Cell(50, 10, 'Percentage / GPA', 1);
        $pdf->Ln();

        $educationDetails = json_decode($employee['educations'], true);
        $count = 1;
        foreach ($educationDetails as $edu) {
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(10, 10, $count++, 1); // Increment sl no and display
            $pdf->Cell(40, 10, $edu['degree'], 1);
            $pdf->Cell(50, 10, $edu['institution'], 1);
            $pdf->Cell(30, 10, (new DateTime($edu['completion_year']))->format('d-m-Y'), 1);
            $pdf->Cell(50, 10, $edu['aggregate'], 1);
            $pdf->Ln(); // Move to the next line
        }

        $pdf->Ln();
        $sectionHeader('Previous Experience');
        $pdf->Line(10, $pdf->GetY(), $pdf->GetPageWidth() - 10, $pdf->GetY());
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Cell(10, 10, 'Sl#', 1);
        $pdf->Cell(60, 10, 'Company', 1);
        $pdf->Cell(50, 10, 'Role', 1);
        $pdf->Cell(50, 10, 'Experience (in years)', 1);
        $pdf->Ln();

        $previousDetails = json_decode($employee['experiences'], true);
        $count = 1;
        foreach ($previousDetails as $exp) {
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(10, 10, $count++, 1); // Increment sl no and display
            $pdf->Cell(60, 10, $exp['company_name'], 1);
            $pdf->Cell(50, 10, $exp['position'], 1);
            $pdf->Cell(50, 10, $exp['year_of_exp'], 1);
            $pdf->Ln();
        }

        $pdf->Ln();

        $sectionHeader('Family Details');
        $pdf->Line(10, $pdf->GetY(), $pdf->GetPageWidth() - 10, $pdf->GetY());
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Cell(10, 10, 'Sl#', 1);
        $pdf->Cell(60, 10, 'Name', 1);
        $pdf->Cell(50, 10, 'Relationship', 1);
        $pdf->Cell(50, 10, 'Occupation', 1);
        $pdf->Ln();

        $familyDetails = json_decode($employee['families'], true);
        $count = 1;
        foreach ($familyDetails as $fam) {
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(10, 10, $count++, 1); // Increment sl no and display
            $pdf->Cell(60, 10, $fam['first_name'] ." ".$fam['last_name'], 1);
            $pdf->Cell(50, 10, $fam['relationship'], 1);
            $pdf->Cell(50, 10, $fam['occupation'], 1);
            $pdf->Ln();
        }

        $pdf->Ln();
        // Output the PDF
        return response($pdf->Output(), 200)
            ->header('Content-Type', 'application/pdf');

        exit;

    }
}

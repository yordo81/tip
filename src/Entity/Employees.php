<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeesRepository")
 */
class Employees
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $lasname;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Departments", inversedBy="departments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $department;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CtrlMov", mappedBy="employee")
     */
    private $employee;

    public function __construct()
    {
        $this->employee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLasname(): ?string
    {
        return $this->lasname;
    }

    public function setLasname(string $lasname): self
    {
        $this->lasname = $lasname;

        return $this;
    }

    public function getDepartment(): ?Departments
    {
        return $this->department;
    }

    public function setDepartment(?Departments $department): self
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return Collection|CtrlMov[]
     */
    public function getEmployee(): Collection
    {
        return $this->employee;
    }

    public function addEmployee(CtrlMov $employee): self
    {
        if (!$this->employee->contains($employee)) {
            $this->employee[] = $employee;
            $employee->setEmployee($this);
        }

        return $this;
    }

    public function removeEmployee(CtrlMov $employee): self
    {
        if ($this->employee->contains($employee)) {
            $this->employee->removeElement($employee);
            // set the owning side to null (unless already changed)
            if ($employee->getEmployee() === $this) {
                $employee->setEmployee(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name ." ". $this->lasname;
    }
}

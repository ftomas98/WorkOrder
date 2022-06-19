using System;
using System.ComponentModel.DataAnnotations.Schema;
using System.Data.Entity;
using System.Linq;

namespace MVCworkorderDB.Models
{
    public partial class Model2 : DbContext
    {
        public Model2()
            : base("name=Model2")
        {
        }

        public virtual DbSet<companys> companys { get; set; }
        public virtual DbSet<managers> managers { get; set; }
        public virtual DbSet<locations> locations { get; set; }
        public virtual DbSet<sysdiagrams> sysdiagrams { get; set; }

        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {
            modelBuilder.Entity<departments>()
                .Property(e => e.name)
                .IsUnicode(false);

            modelBuilder.Entity<departments>()
                .HasMany(e => e.faculty1)
                .WithRequired(e => e.departments1)
                .HasForeignKey(e => e.department_id)
                .WillCascadeOnDelete(false);

            modelBuilder.Entity<departments>()
                .HasMany(e => e.managers)
                .WithOptional(e => e.departments)
                .HasForeignKey(e => e.department_id);

            modelBuilder.Entity<departments>()
                .HasMany(e => e.locations)
                .WithRequired(e => e.departments)
                .HasForeignKey(e => e.department_id)
                .WillCascadeOnDelete(false);

            modelBuilder.Entity<faculty>()
                .Property(e => e.first_name)
                .IsUnicode(false);

            modelBuilder.Entity<faculty>()
                .Property(e => e.last_name)
                .IsUnicode(false);

            modelBuilder.Entity<faculty>()
                .Property(e => e.phone)
                .IsUnicode(false);

            modelBuilder.Entity<faculty>()
                .HasMany(e => e.departments)
                .WithOptional(e => e.faculty)
                .HasForeignKey(e => e.hod_id);

            modelBuilder.Entity<faculty>()
                .HasMany(e => e.locations)
                .WithRequired(e => e.faculty)
                .HasForeignKey(e => e.faculty_id)
                .WillCascadeOnDelete(false);

            modelBuilder.Entity<managers>()
                .Property(e => e.first_name)
                .IsUnicode(false);

            modelBuilder.Entity<managers>()
                .Property(e => e.last_name)
                .IsUnicode(false);

            modelBuilder.Entity<managers>()
                .Property(e => e.phone)
                .IsUnicode(false);

            modelBuilder.Entity<managers>()
                .HasMany(e => e.companys)
                .WithRequired(e => e.managers)
                .HasForeignKey(e => e.manager_roll_num)
                .WillCascadeOnDelete(false);

            modelBuilder.Entity<locations>()
                .Property(e => e.name)
                .IsUnicode(false);

            modelBuilder.Entity<locations>()
                .HasMany(e => e.companys)
                .WithRequired(e => e.locations)
                .HasForeignKey(e => e.location_id)
                .WillCascadeOnDelete(false);
        }
    }
}

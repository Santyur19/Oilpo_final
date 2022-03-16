﻿// <auto-generated />
using System;
using InvoiceOne.Data.AppDataContext;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Infrastructure;
using Microsoft.EntityFrameworkCore.Metadata;
using Microsoft.EntityFrameworkCore.Storage.ValueConversion;

namespace Oilpo
{
    [DbContext(typeof(InvoiceDbContext))]
    partial class InvoiceDbContextModelSnapshot : ModelSnapshot
    {
        protected override void BuildModel(ModelBuilder modelBuilder)
        {
#pragma warning disable 612, 618
            modelBuilder
                .HasAnnotation("ProductVersion", "2.1.14-servicing-32113")
                .HasAnnotation("Relational:MaxIdentifierLength", 128)
                .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

            modelBuilder.Entity("InvoiceOne.Core.Entity.CustomerModel", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<string>("Adrress");

                    b.Property<DateTime>("CreateDate")
                        .HasColumnType("datetime2");

                    b.Property<string>("Email");

                    b.Property<bool>("IsDelete");

                    b.Property<string>("Name")
                        .IsRequired();

                    b.Property<string>("Notes");

                    b.Property<string>("Phone")
                        .IsRequired();

                    b.Property<DateTime>("UpdateDate")
                        .HasColumnType("datetime2");

                    b.HasKey("Id");

                    b.ToTable("Customer");
                });

            modelBuilder.Entity("InvoiceOne.Core.Entity.SalesItemsModel", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<double>("Amount");

                    b.Property<DateTime>("CreateDate")
                        .HasColumnType("datetime2");

                    b.Property<bool>("IsDelete");

                    b.Property<string>("Name");

                    b.Property<double>("Price");

                    b.Property<int>("ProductId");

                    b.Property<int>("Quantity");

                    b.Property<int>("SalesId");

                    b.Property<DateTime>("UpdateDate")
                        .HasColumnType("datetime2");

                    b.HasKey("Id");

                    b.HasIndex("SalesId");

                    b.ToTable("SalesItems");
                });

            modelBuilder.Entity("InvoiceOne.Core.Entity.SalesModel", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<DateTime>("CreateDate")
                        .HasColumnType("datetime2");

                    b.Property<int>("CustomerId");

                    b.Property<double?>("Discount");

                    b.Property<double>("GrandTotal");

                    b.Property<bool>("IsDelete");

                    b.Property<string>("Notes");

                    b.Property<string>("PaymentMethod");

                    b.Property<string>("SaleCode");

                    b.Property<DateTime>("SalesDate");

                    b.Property<string>("Status");

                    b.Property<double>("Total");

                    b.Property<DateTime>("UpdateDate")
                        .HasColumnType("datetime2");

                    b.HasKey("Id");

                    b.HasIndex("CustomerId");

                    b.ToTable("Sales");
                });

            modelBuilder.Entity("InvoiceOne.Core.Entity.StoreSettingModel", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<string>("Address")
                        .IsRequired();

                    b.Property<DateTime>("CreateDate")
                        .HasColumnType("datetime2");

                    b.Property<string>("Currency")
                        .IsRequired();

                    b.Property<string>("Email")
                        .IsRequired();

                    b.Property<bool>("IsDelete");

                    b.Property<string>("Logo");

                    b.Property<string>("Phone")
                        .IsRequired();

                    b.Property<string>("StoreName")
                        .IsRequired();

                    b.Property<DateTime>("UpdateDate")
                        .HasColumnType("datetime2");

                    b.Property<string>("Web")
                        .IsRequired();

                    b.HasKey("Id");

                    b.ToTable("StoreSetting");
                });

            modelBuilder.Entity("InvoiceOne.Core.Entity.UserModel", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<string>("ConfirmPassword")
                        .IsRequired();

                    b.Property<DateTime>("CreateDate")
                        .HasColumnType("datetime2");

                    b.Property<string>("Email")
                        .IsRequired();

                    b.Property<bool>("IsDelete");

                    b.Property<string>("Password")
                        .IsRequired()
                        .HasMaxLength(5);

                    b.Property<DateTime>("UpdateDate")
                        .HasColumnType("datetime2");

                    b.HasKey("Id");

                    b.ToTable("Users");
                });

            modelBuilder.Entity("InvoiceOne.Core.ProductModel", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<string>("Code")
                        .IsRequired();

                    b.Property<DateTime>("CreateDate")
                        .HasColumnType("datetime2");

                    b.Property<string>("Description");

                    b.Property<bool>("IsDelete");

                    b.Property<string>("Name")
                        .IsRequired();

                    b.Property<string>("Notes");

                    b.Property<double>("Price");

                    b.Property<int>("Stock");

                    b.Property<DateTime>("UpdateDate")
                        .HasColumnType("datetime2");

                    b.HasKey("Id");

                    b.ToTable("Product");
                });

            modelBuilder.Entity("InvoiceOne.Core.Entity.SalesItemsModel", b =>
                {
                    b.HasOne("InvoiceOne.Core.Entity.SalesModel", "SalesModel")
                        .WithMany("Items")
                        .HasForeignKey("SalesId")
                        .OnDelete(DeleteBehavior.Cascade);
                });

            modelBuilder.Entity("InvoiceOne.Core.Entity.SalesModel", b =>
                {
                    b.HasOne("InvoiceOne.Core.Entity.CustomerModel", "CustomerModel")
                        .WithMany()
                        .HasForeignKey("CustomerId")
                        .OnDelete(DeleteBehavior.Cascade);
                });
#pragma warning restore 612, 618
        }
    }
}
